<?php
/**
 * Elgg friends page
 *
 * @package Elgg.Core
 * @subpackage Social.Friends
 */

$owner = elgg_get_page_owner_entity();
if (!$owner) {
	// unknown user so send away (@todo some sort of 404 error)
	forward();
}

$title = elgg_echo("friends:owned", array($owner->name));

$options = array(
	'relationship' => 'friend',
	'relationship_guid' => $owner->getGUID(),
	'inverse_relationship' => false,
	'type' => 'user',
	'full_view' => false,
	'no_results' => elgg_echo('friends:none'),
);
$content = elgg_list_entities_from_relationship($options);

$params = array(
	'content' => $content,
	'title' => $title,
);
$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);
