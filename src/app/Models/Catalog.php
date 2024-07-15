<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $table = 'catalogs';

    protected $guarded = [];

    // get title by id in blade
    public function title($id)
    {
        return $this->where('id', $id)->pluck('title')[0] ?? '-';
    }

    // get list of catalogs for blade
    public static function table()
    {
        return Catalog::all();
    }

    // get a tree list for blade
    public static function tree()
    {
        $allCatalogs = Catalog::all();

        $rootCatalogs = $allCatalogs->whereNull('parent_id');

        self::formatTree($rootCatalogs, $allCatalogs);

        return $rootCatalogs;
    }

    // check each catalog for children
    private static function formatTree($catalogs, $allCatalogs)
    {
        foreach ($catalogs as $catalog) {
            $catalog->children = $allCatalogs->where('parent_id', $catalog->id)->values();

            if ($catalog->children->isNotEmpty()) {
                self::formatTree($catalog->children, $allCatalogs);
            }
        }
    }
}
