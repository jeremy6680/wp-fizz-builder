<?php

/****************************
**** COMPONENT: HERO ********
*****************************/ 

use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Link;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Image;

return Group::make('Hero')
        ->instructions('Add a hero block with title, content and image to the page.')
        ->fields([
            Text::make('Title'),
            Textarea::make('Outline')
            ->rows(3),
            Image::make('Background Image', 'background_image')
            ->returnFormat('object'),
            Group::make('Buttons')
            ->instructions('Add a hero block with title, content and image to the page.')
            ->fields([
                Link::make('CTA', 'cta'),
                Link::make('Other link', 'other_link'),
            ])
            ->layout('table')
        ])
        ->layout('row');