<?php

namespace Dynamic\Recipe\Fixtures\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\ReadonlyField;

/**
 * Extension that adds a FixtureIdentifier field to DataObjects.
 *
 * This allows fixtures to be uniquely identified and merged during
 * populate runs, without affecting user-created content that shares
 * the same Title.
 */
class FixtureRecordExtension extends Extension
{
    private static array $db = [
        'FixtureIdentifier' => 'Varchar(100)',
    ];

    private static array $indexes = [
        'FixtureIdentifier' => true,
    ];

    /**
     * Display the fixture identifier in CMS for fixture-created records
     */
    public function updateCMSFields(FieldList $fields): void
    {
        if ($this->owner->FixtureIdentifier) {
            $fields->addFieldToTab(
                'Root.Settings',
                ReadonlyField::create('FixtureIdentifier', 'Fixture ID')
                    ->setDescription('This record was created from a fixture and will be updated on populate runs.')
            );
        }
    }
}
