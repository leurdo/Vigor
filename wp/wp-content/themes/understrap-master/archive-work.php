<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

$pagelink=get_page_link (get_page_by_title( 'Объекты' ));
header("Location: $pagelink",TRUE,301);