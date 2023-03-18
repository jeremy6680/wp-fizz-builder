<?php

/****************************
**** COMPONENT: FEATURES ****
*****************************/

use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Link;

return Group::make('How it Works', 'how_it_works')
        ->fields([
            Text::make('Title'),
            Text::make('Subtitle'),
            Textarea::make('Introduction'),
            Group::make('Buttons')
            ->fields([
                Text::make('CTA name', 'cta_name'),
                Link::make('CTA URL', 'cta_url'),
                Text::make('Other link name', 'other_link_name'),
                Link::make('Other link URL', 'other_link_URL'),
            ]),
            Repeater::make('Steps')
            ->instructions('Each step in the list includes a title and a short description.')
            ->fields([
                Text::make('Name'),
                Textarea::make('Description')
                ])
            ->min(3)
            ->max(6)
            ->collapsed('steps')
            ->buttonLabel('Add a step')
            ->layout('table')
        ]);