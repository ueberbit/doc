<?php
declare(strict_types=1);

namespace GeorgRinger\Doc\Widgets\Provider;

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Dashboard\Widgets\ButtonProviderInterface;
use TYPO3\CMS\Backend\Routing\UriBuilder;

/**
 * Provide link for project documentation.
 * Check whether EXT:doc is enabled and add link to module.
 * No link is returned if not enabled.
 */
class ExtDocButtonProvider implements ButtonProviderInterface
{
    public function __construct(
        private readonly string $title,
        private readonly string $target = '')
    {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getLink(): string
    {
        if (ExtensionManagementUtility::isLoaded('doc')) {
            $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
            return (string)$uriBuilder->buildUriFromRoute('doc');
        }

        return '';
    }

    public function getTarget(): string
    {
        return $this->target;
    }
}
