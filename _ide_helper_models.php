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
 * @method static Builder|Blacklist newModelQuery()
 * @method static Builder|Blacklist newQuery()
 * @method static Builder|Blacklist query()
 * @mixin \Eloquent
 */
	class IdeHelperBlacklist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @method static Builder|Faq newModelQuery()
 * @method static Builder|Faq newQuery()
 * @method static Builder|Faq query()
 * @mixin \Eloquent
 */
	class IdeHelperFaq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property-read \App\Models\User $user
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 * @mixin \Eloquent
 */
	class IdeHelperMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 * @mixin \Eloquent
 */
	class IdeHelperNews extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @method static Builder|Price newModelQuery()
 * @method static Builder|Price newQuery()
 * @method static Builder|Price query()
 * @mixin \Eloquent
 */
	class IdeHelperPrice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @mixin \Eloquent
 */
	class IdeHelperRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rule
 *
 * @method static Builder|Rule newModelQuery()
 * @method static Builder|Rule newQuery()
 * @method static Builder|Rule query()
 * @mixin \Eloquent
 */
	class IdeHelperRule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Support
 *
 * @method static Builder|Support newModelQuery()
 * @method static Builder|Support newQuery()
 * @method static Builder|Support query()
 * @mixin \Eloquent
 */
	class IdeHelperSupport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 */
	class IdeHelperUser extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

