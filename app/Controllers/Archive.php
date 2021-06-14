<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Archive extends Controller
{
    protected $acf = true; // enable ACF


    
    public function projects() {
        $arg = [
            'posts_per_page' => -1,
            'post_type' => 'project'
        ];

        $projects = get_posts($arg);
        $projects_clean = [];

        if(!empty($projects)) {
            foreach($projects as $project) {
                $projects_clean[] = [
                    'title'   => $project->post_title,
                    'slug'    => $project->post_name,
                    'image'   => get_the_post_thumbnail_url($project->ID),
                    'link'    => get_permalink($projet->ID)
                ];
            }
        }

        return $projects_clean;
    }
}
