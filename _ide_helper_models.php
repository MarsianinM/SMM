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
 * @method static \Illuminate\Database\Eloquent\Builder|Balance newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Balance newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Balance query()
 * @mixin \Eloquent
 */
	class IdeHelperBalance extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Blacklist
 *
 * @mixin IdeHelperBlacklist
 * @method static Builder|Blacklist newModelQuery()
 * @method static Builder|Blacklist newQuery()
 * @method static Builder|Blacklist query()
 */
	class IdeHelperBlacklist extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Faq
 *
 * @mixin IdeHelperFaq
 * @method static Builder|Faq newModelQuery()
 * @method static Builder|Faq newQuery()
 * @method static Builder|Faq query()
 */
	class IdeHelperFaq extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @mixin IdeHelperMessage
 * @property-read \App\Models\User $user
 * @method static Builder|Message newModelQuery()
 * @method static Builder|Message newQuery()
 * @method static Builder|Message query()
 */
	class IdeHelperMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\News
 *
 * @mixin IdeHelperNews
 * @method static Builder|News newModelQuery()
 * @method static Builder|News newQuery()
 * @method static Builder|News query()
 */
	class IdeHelperNews extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Price
 *
 * @mixin IdeHelperPrice
 * @method static Builder|Price newModelQuery()
 * @method static Builder|Price newQuery()
 * @method static Builder|Price query()
 */
	class IdeHelperPrice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @mixin \Eloquent
 */
	class IdeHelperProject extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Role
 *
 * @mixin IdeHelperRole
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 */
	class IdeHelperRole extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Rule
 *
 * @mixin IdeHelperRule
 * @method static Builder|Rule newModelQuery()
 * @method static Builder|Rule newQuery()
 * @method static Builder|Rule query()
 */
	class IdeHelperRule extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Support
 *
 * @mixin IdeHelperSupport
 * @method static Builder|Support newModelQuery()
 * @method static Builder|Support newQuery()
 * @method static Builder|Support query()
 */
	class IdeHelperSupport extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @mixin IdeHelperUser
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Balance[] $balances
 * @property-read int|null $balances_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 */
	class IdeHelperUser extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

