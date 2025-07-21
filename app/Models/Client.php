<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $fillable = [
        'name',
    ];

    public function ledgerEntries()
    {
        return $this->hasMany(LedgerEntry::class, 'client_id');
    }
}
