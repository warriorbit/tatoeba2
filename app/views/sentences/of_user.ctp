<?php
/**
 * Tatoeba Project, free collaborative creation of multilingual corpuses project
 * Copyright (C) 2010  Allan SIMON <allan.simon@supinfo.com>
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
 * @author   Allan SIMON <allan.simon@supinfo.com>
 * @license  Affero General Public License
 * @link     http://tatoeba.org
 */

if ($userExists === true) {
    $numberOfSentences = (int) $paginator->counter(
        array(
            "format" => "%count%"
        )
    );
    $paginator->options(
        array(
            'url' => $this->params['pass']
        ) 
    );

}
?>

<div id="annexe_content">
    <?php $commonModules->createFilterByLangMod(2); ?> 
</div>
    
    
<div id="main_content">
    <div class="module">

    <?php
    if ($userExists === false) {
        $commonModules->displayNoSuchUser($userName, $backLink);
    } elseif ($numberOfSentences === 0) {
        echo '<h2>';
        echo sprintf(
            __("%s does not have sentences in %s", true),
            $userName,
            $languages->codeToName($lang)
        );
        echo '</h2>';

        echo $html->link(__('Go back to previous page', true), $backLink);

    } else {
        ?>

        <h2>
            <?php 
            echo $paginator->counter(
                array(
                    'format' => sprintf(__("%s's sentences", true), $userName) 
                        . ' ' . __("(total %count%)", true)
                )
            ); 
            ?>
        </h2>
        
        <div class="paging">
        <?php 
        echo $paginator->prev(
            '<< '.__('previous', true), 
            array(), 
            null, 
            array('class'=>'disabled')
        ); 
        
        echo $paginator->numbers(
            array(
                'url' => array($userName, $lang),
                'separator' => ''
            )
        ); 
        
        echo $paginator->next(
            __('next', true).' >>',
            array(),
            null, 
            array('class'=>'disabled')
        ); 
        ?>
        </div>
        
        <?php
        $type = 'mainSentence';
        $parentId = null;
        $withAudio = false;
        foreach ($user_sentences as $sentence) {
            $ownerName = $sentence['User']['username'];
            $sentences->displayGenericSentence(
                $sentence['Sentence'],
                $ownerName,
                $type,
                $parentId,
                $withAudio
            );
        }
        ?>
        
        <div class="paging">
        <?php 
        echo $paginator->prev(
            '<< '.__('previous', true), 
            array(), 
            null, 
            array('class'=>'disabled')
        ); 
        ?>
        <?php echo $paginator->numbers(array('separator' => '')); ?>
        <?php 
        echo $paginator->next(
            __('next', true).' >>', 
            array(), 
            null, 
            array('class'=>'disabled')
        ); 
        ?>
        </div>

    <?php
    }
    ?>
    </div>
</div>