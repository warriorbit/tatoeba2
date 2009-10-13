<?php
/*
    Tatoeba Project, free collaborativ creation of languages corpuses project
    Copyright (C) 2009  TATOEBA Project(should be changed)

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
$javascript->link('sentences.contribute.js', false);

echo '<h2 class="add">';
__('Add another sentence');
echo '</h2>';

echo '<div class="sentences_set">';
	echo '<div class="new">';
	echo $form->input('text', array("label" => __('Sentence : ', true), "id" => "newSentenceText"));
	echo $form->button('OK', array("id" => "submitNewSentence"));
	echo '</div>';
echo '</div>';

echo '<br/>';

echo '<h2>';
__('Sentences added');
echo '</h2>';

echo '<div id="sentencesAdded">';
	if(isset($sentence)){
		echo "<h1>id =$fakeid;</h1>" .'<div class="sentences_set">';
		// sentence menu (translate, edit, comment, etc)
		$sentences->displayMenu($sentence['Sentence']['id'], $specialOptions);

		// sentence and translations
		$sentences->displayForTranslation($sentence['Sentence'], array());
		echo '</div>';
	}
echo '</div>';
?>