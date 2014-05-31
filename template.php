<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function shadowyzen_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  shadowyzen_preprocess_html($variables, $hook);
  shadowyzen_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
function shadowyzen_preprocess_html(&$variables, $hook) {
  drupal_add_css('//fonts.googleapis.com/css?family=Marmelad|Inconsolata&subset=latin,cyrillic', array('group' => CSS_THEME));

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function shadowyzen_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function shadowyzen_preprocess_node(&$variables, $hook) {
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function shadowyzen_preprocess_comment(&$variables, $hook) {
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function shadowyzen_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function shadowyzen_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

function shadowyzen_username($variables) {
  $u_css_class = '';
  $u = user_load($variables['account']->uid);
  // style depends on the role
  if (!empty($u) && $u->uid == 1) {
    $u_css_class='administrator';
    $u_title=t('Administrator');
  }
  elseif(empty($u->roles)) {
    $u_css_class='anonymous';
    $u_title=t('Anonymous');
  }
  /* TODO roles is an array in D7, with rid as the key and name as the value */
  elseif (in_array('node moderator', array_values($u->roles))) {
    $u_css_class='node-moderator';
    $u_title=t('Node moderator');
  }
  elseif (in_array('forum moderator', array_values($u->roles))) {
    $u_css_class='forum-moderator';
    $u_title=t('Forum moderator');
  }
  else {
    $u_css_class='ordinary-user';
    $u_title=t('Ordinary user');
  }
  $variables['link_options']['attributes']['class'][] = $u_css_class;
  $variables['link_options']['attributes']['title'] = $u_title;
  if (isset($u->country_iso_code_2)) {
    $country_list = country_get_list();
    $country_name = $country_list[$u->country_iso_code_2];
    $variables['link_options']['attributes']['class'][] = $u->country_iso_code_2;
    $variables['link_options']['attributes']['title'] .= ', ' . $country_name;
  }
  if (isset($variables['link_path'])) {
    // We have a link path, so we should generate a link using l().
    // Additional classes may be added as array elements like
    // $variables['link_options']['attributes']['class'][] = 'myclass';
    $output = l($variables['name'] . $variables['extra'], $variables['link_path'], $variables['link_options']);
  }
  else {
    // Modules may have added important attributes so they must be included
    // in the output. Additional classes may be added as array elements like
    // $variables['attributes_array']['class'][] = 'myclass';
    $output = '<span' . drupal_attributes($variables['attributes_array']) . '>' . $variables['name'] . $variables['extra'] . '</span>';
  }
  return $output;
}
