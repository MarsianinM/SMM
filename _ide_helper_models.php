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
 * @mixin IdeHelperBlacklist
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
 */
	class Blacklist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @mixin IdeHelperFaq
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
 */
	class Faq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @mixin IdeHelperMessage
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
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @mixin IdeHelperNews
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
 */
	class News extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @mixin IdeHelperPrice
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
 */
	class Price extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rule
 *
 * @mixin IdeHelperRule
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
 */
	class Rule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Support
 *
 * @mixin IdeHelperSupport
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
 */
	class Support extends \Eloquent {}
}

