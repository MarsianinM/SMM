<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property int $pro
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
class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
