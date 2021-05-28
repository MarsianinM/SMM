<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Balance
 *
 * @mixin IdeHelperBalance
 * @property int $id
 * @property string $amount
 * @property int $user_id
 * @property int $currency_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Balance newModelQuery()
 * @method static Builder|Balance newQuery()
 * @method static Builder|Balance query()
 * @method static Builder|Balance whereAmount($value)
 * @method static Builder|Balance whereCreatedAt($value)
 * @method static Builder|Balance whereCurrencyId($value)
 * @method static Builder|Balance whereId($value)
 * @method static Builder|Balance whereUpdatedAt($value)
 * @method static Builder|Balance whereUserId($value)
 */
	class IdeHelperBalance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blacklist
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\BlacklistFactory factory(...$parameters)
 * @method static Builder|Blacklist newModelQuery()
 * @method static Builder|Blacklist newQuery()
 * @method static Builder|Blacklist query()
 * @method static Builder|Blacklist whereCreatedAt($value)
 * @method static Builder|Blacklist whereId($value)
 * @method static Builder|Blacklist whereUpdatedAt($value)
 * @mixin IdeHelperBlacklist
 */
	class IdeHelperBlacklist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\FaqFactory factory(...$parameters)
 * @method static Builder|Faq newModelQuery()
 * @method static Builder|Faq newQuery()
 * @method static Builder|Faq query()
 * @method static Builder|Faq whereCreatedAt($value)
 * @method static Builder|Faq whereId($value)
 * @method static Builder|Faq whereUpdatedAt($value)
 * @mixin IdeHelperFaq
 */
	class IdeHelperFaq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $message
 * @property int $sender_id
 * @property int $receiver_id
 * @property int $parent_id
 * @property int $read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\MessageFactory factory(...$parameters)
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @method static Builder|Message whereCreatedAt($value)
 * @method static Builder|Message whereId($value)
 * @method static Builder|Message whereMessage($value)
 * @method static Builder|Message whereParentId($value)
 * @method static Builder|Message whereRead($value)
 * @method static Builder|Message whereReceiverId($value)
 * @method static Builder|Message whereSenderId($value)
 * @method static Builder|Message whereUpdatedAt($value)
 * @mixin IdeHelperMessage
 */
	class IdeHelperMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\NewsFactory factory(...$parameters)
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @method static Builder|News whereCreatedAt($value)
 * @method static Builder|News whereId($value)
 * @method static Builder|News whereUpdatedAt($value)
 * @mixin IdeHelperNews
 * @property string $slug
 * @property int $sort_order
 * @property string $active
 * @method static Builder|News whereActive($value)
 * @method static Builder|News whereSlug($value)
 * @method static Builder|News whereSortOrder($value)
 */
	class IdeHelperNews extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PriceFactory factory(...$parameters)
 * @method static Builder|Price newModelQuery()
 * @method static Builder|Price newQuery()
 * @method static Builder|Price query()
 * @method static Builder|Price whereCreatedAt($value)
 * @method static Builder|Price whereId($value)
 * @method static Builder|Price whereUpdatedAt($value)
 * @mixin IdeHelperPrice
 */
	class IdeHelperPrice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @mixin IdeHelperProject
 * @property int $id
 * @property string $title
 * @property string|null $link
 * @property int $moderation_comments
 * @property int $small_comments
 * @property int $screenshot
 * @property int $user_pro
 * @property string $description
 * @property string|null $date_start
 * @property string|null $date_finish
 * @property string|null $page_link
 * @property string|null $status
 * @property int $archive
 * @property int $pro
 * @property int $client_id
 * @property int|null $author_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $rate_id
 * @property int|null $subject_id
 * @property string $language
 * @property int|null $currency_id
 * @property int|null $group_id
 * @property int|null $author_group_id
 * @property string $notification
 * @property string $type_project
 * @property mixed|null $email_notifications
 * @property string|null $deleted_at
 * @property string|null $price
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereArchive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAuthorGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCurrencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDateFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereEmailNotifications($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereModerationComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePageLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereRateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereScreenshot($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSmallComments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereSubjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTypeProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserPro($value)
 */
	class IdeHelperProject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @mixin IdeHelperRole
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 */
	class IdeHelperRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rule
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\RuleFactory factory(...$parameters)
 * @method static Builder|Rule newModelQuery()
 * @method static Builder|Rule newQuery()
 * @method static Builder|Rule query()
 * @method static Builder|Rule whereCreatedAt($value)
 * @method static Builder|Rule whereId($value)
 * @method static Builder|Rule whereUpdatedAt($value)
 * @mixin IdeHelperRule
 */
	class IdeHelperRule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @mixin IdeHelperSetting
 * @property int $id
 * @property int $user_id
 * @property mixed $data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $value
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUserId($value)
 */
	class IdeHelperSetting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Support
 *
 * @property int $id
 * @property string|null $theme
 * @property string $message
 * @property int $sender_id
 * @property int $receiver_id
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\SupportFactory factory(...$parameters)
 * @method static Builder|Support newModelQuery()
 * @method static Builder|Support newQuery()
 * @method static Builder|Support query()
 * @method static Builder|Support whereCreatedAt($value)
 * @method static Builder|Support whereId($value)
 * @method static Builder|Support whereMessage($value)
 * @method static Builder|Support whereParentId($value)
 * @method static Builder|Support whereReceiverId($value)
 * @method static Builder|Support whereSenderId($value)
 * @method static Builder|Support whereTheme($value)
 * @method static Builder|Support whereUpdatedAt($value)
 * @mixin IdeHelperSupport
 */
	class IdeHelperSupport extends \Eloquent {}
}

