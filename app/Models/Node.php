<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;
    protected $table = 'nodes';
    protected $fillable = ['text', 'parent_id', 'fill'];

    public static function boot()
    {
        parent::boot();

        // Event handler ketika node akan dihapus
        static::deleting(function ($node) {
            // Perbarui parent_id dari node-child yang terkait
            static::where('parent_id', $node->id)->update(['parent_id' => $node->parent_id]);
        });
    }

    // Definisikan relasi untuk node parent
    public function parent()
    {
        return $this->belongsTo(Node::class, 'parent_id');
    }

    // Definisikan relasi untuk node-child
    public function children()
    {
        return $this->hasMany(Node::class, 'parent_id');
    }
}
