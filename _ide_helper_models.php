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
 * @property-read \App\Models\User $user
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
 * @property string $title
 * @property string $slug
 * @property string|null $quote
 * @property string $content
 * @property string $active
 * @property string|null $alt_img
 * @property string|null $title_img
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property string|null $seo_keywords
 * @method static Builder|News whereActive($value)
 * @method static Builder|News whereAltImg($value)
 * @method static Builder|News whereContent($value)
 * @method static Builder|News whereQuote($value)
 * @method static Builder|News whereSeoDescription($value)
 * @method static Builder|News whereSeoKeywords($value)
 * @method static Builder|News whereSeoTitle($value)
 * @method static Builder|News whereSlug($value)
 * @method static Builder|News whereTitle($value)
 * @method static Builder|News whereTitleImg($value)
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

namespace App\Models{
/**
 * App\Models\User
 *
 * @mixin IdeHelperUser
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $active
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Balance[] $balances
 * @property-read int|null $balances_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class IdeHelperUser extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

