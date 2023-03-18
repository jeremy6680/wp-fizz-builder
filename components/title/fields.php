<?php

/****************************
**** COMPONENT: TITLE *******
*****************************/ 

use Extended\ACF\Fields\Group;
use Extended\ACF\Fields\Text;
use Extended\ACF\Fields\Textarea;

return Group::make('Heading')
        ->fields([
            Text::make('Title'),
            Textarea::make('Outline')
            ->rows(3),
        ]);