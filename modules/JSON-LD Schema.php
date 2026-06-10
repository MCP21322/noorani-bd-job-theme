<?php
/**
 * নূরানী মাদ্রাসা জবের জন্য অটোমেটিক JSON-LD Schema জেনারেট করা
 */
function add_job_schema_to_head() {
    // run only for sigle post 
    if ( is_singular('job') ) {
        global $post;

        // get data from mata field
        $job_id      = $post->ID;
        $title       = esc_attr($post->post_title);
        $description = wp_strip_all_tags($post->post_content);
        $date_posted = get_the_date('c', $job_id);
        $expiry_date = date('c', strtotime($date_posted . ' + 30 days')); // ডিফল্ট ৩০ দিন মেয়াদ
        
        $company     = get_post_meta($job_id, 'company_name', true) ? get_post_meta($job_id, 'company_name', true) : 'নূরানী মাদ্রাসা';
        $location    = get_post_meta($job_id, 'job_location', true) ? get_post_meta($job_id, 'job_location', true) : 'বাংলাদেশ';

        ?>
        <script type="application/ld+json">
        {
            "@context": "https://schema.org/",
            "@type": "JobPosting",
            "title": "<?php echo $title; ?>",
            "description": "<?php echo $description; ?>",
            "datePosted": "<?php echo $date_posted; ?>",
            "validThrough": "<?php echo $expiry_date; ?>",
            "employmentType": "FULL_TIME",
            "hiringOrganization": {
                "@type": "Organization",
                "name": "<?php echo esc_attr($company); ?>",
                "sameAs": "<?php echo home_url(); ?>"
            },
            "jobLocation": {
                "@type": "Place",
                "address": {
                    "@type": "PostalAddress",
                    "streetAddress": "<?php echo esc_attr($location); ?>",
                    "addressLocality": "<?php echo esc_attr($location); ?>",
                    "addressCountry": "BD"
                }
            },
            "baseSalary": {
                "@type": "MonetaryAmount",
                "currency": "BDT",
                "value": {
                    "@type": "QuantitativeValue",
                    "unitText": "MONTH"
                }
            }
        }
        </script>
        <?php
    }
}
add_action('wp_head', 'add_job_schema_to_head');

