<?php

/****************************
**** COMPONENT: FEATURES ****
*****************************/

use Extended\ACF\Fields\Repeater;
use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;
use Extended\ACF\Fields\Image;

return Group::make('Features')
        ->fields([
            Text::make('Title'),
            Repeater::make('Features')
            ->instructions('Each feature includes an image, a name and a short description.')
            ->fields([
                Text::make('Name'),
                Textarea::make('Description'),
                Image::make('Image')
                ->returnFormat('object')
                ])
            ->min(3)
            ->max(6)
            ->collapsed('features')
            ->buttonLabel('Add a feature')
            ->layout('table')
        ]);