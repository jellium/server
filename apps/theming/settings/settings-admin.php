<?php
/**
 * @copyright Copyright (c) 2016 Bjoern Schiessle <bjoern@schiessle.org>
 * @copyright Copyright (c) 2016 Lukas Reschke <lukas@statuscode.ch>
 *
 * @author Bjoern Schiessle <bjoern@schiessle.org>
 * @author Lukas Reschke <lukas@statuscode.ch>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

$config = \OC::$server->getConfig();
$l = \OC::$server->getL10N('theming');
$urlGenerator = \OC::$server->getURLGenerator();

$theming = \OC::$server->getThemingDefaults();

$themable = true;
$errorMessage = '';
$theme = $config->getSystemValue('theme', '');

if ($theme !== '') {
	$themable = false;
	$errorMessage = $l->t('You already use a custom theme');
}

$template = new \OCP\Template('theming', 'settings-admin');

$template->assign('themable', $themable);
$template->assign('errorMessage', $errorMessage);
$template->assign('name', $theming->getEntity());
$template->assign('url', $theming->getBaseUrl());
$template->assign('slogan', $theming->getSlogan());
$template->assign('color', $theming->getMailHeaderColor());
$path = $urlGenerator->linkToRoute('theming.Theming.updateLogo');
$template->assign('uploadLogoRoute', $path);

return $template->fetchPage();
