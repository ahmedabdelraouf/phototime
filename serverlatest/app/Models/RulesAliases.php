<?php

namespace KBSolutions\Admins\Entities;

use App\Models\MySQLConnectionModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RulesAliases extends MySQLConnectionModel
{
    use HasFactory;

    protected $table = "rules_aliases";

    protected $fillable = [];

    protected static function newFactory()
    {
        return \KBSolutions\Admins\Database\factories\RulesAliasesFactory::new();
    }
}
