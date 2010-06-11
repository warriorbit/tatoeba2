<?php
/**
 * Tatoeba Project, free collaborative creation of multilingual corpuses project
 * Copyright (C) 2010  HO Ngoc Phuong Trang <tranglich@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 *
 * @category PHP
 * @package  Tatoeba
 * @author   HO Ngoc Phuong Trang <tranglich@gmail.com>
 * @license  Affero General Public License
 * @link     http://tatoeba.org
 */

$this->pageTitle = 'Tatoeba - ' . __('How to contribute', true);
?>


<div id="annexe_content">
    <div class="module">
    <?php
    if ($session->read('Auth.User.id')) {
        ?>
        <h2><?php __("Contribute"); ?></h2>
        <?php
        
        echo sprintf(
            __('Go to <a href="%s">Contribute page</a>.', true),
            $html->url(
                array(
                    "controller" => "pages",
                    "action" => "contribute"
                )
            )
        );
        
    } else {
    
        ?>
        <h2><?php __("Register"); ?></h2>
        <?php    
        __('If you are interested, please register.');
        echo $html->link(
            __('Register', true),
            array("controller" => "users", "action" => "register"),
            array("class"=>"registerButton")
        );
    
    }
    ?>
    </div>
    
    <?php
    $attentionPlease->tatoebaNeedsYou();
    ?>
</div>

<div id="main_content">    
    <div class="module">
    <h2><?php __("How can you contribute?"); ?></h2>
    <p>
    <?php
    __(
        "Tatoeba is primarily about collecting sentences and translating them ".
        "into many, many languages. So one obvious thing you can do to contribute ".
        "is to <strong>translate sentences</strong>."
    );
    ?>
    </p>
    
    <p>
    <?php
    __(
        "But you don't have to be a polyglot in order to contribute! You can help ".
        "us a lot simply by <strong>checking sentences</strong> and ".
        "<strong>reporting mitakes</strong>. This is something everyone can do!"
    );
    ?>
    </p>
    
    <p>
    <?php
    __(
        "If you have a good microphone, you can also bring more audio to Tatoeba ".
        "by <strong>recording sentences</strong>."
    );
    ?>
    </p>
    
    <p>
    <?php
    __(
        "You can help us promote the project. <strong>Tell people around ".
        "you</strong> that Tatoeba exits. This is a very ambitious project, so we ".
        "will need as much help as possible."
    );
    ?>
    </p>
    
    <p>
    <?php
    __(
        "And finally, you can <strong>join the team</strong>. You can help us ".
        "code new features, improve the usability, debug, optimize, ensure ".
        "there's no security flaw, etc."
    );
    ?>
    </p>
    </div>
</div>