<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\BlogCategory
 *
 * @property int $id
 * @property int $parent_id
 * @property string $slug
 * @property string $title
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BlogCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'description',
    ];


    public const SOME_BLOG_KEY = 0;

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function getParent(): self
    {
        return $this->parent;
    }

    /**
     * @return int
     */
    public function getParentId(): int
    {
        return $this->parent_id;
    }

    /**
     * @param int $parent_id
     */
    public function setParentId(int $parent_id): void
    {
        $this->parent_id = $parent_id;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getTitleWithDot()
    {
        return $this->getTitle() . ' .';
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }


}
