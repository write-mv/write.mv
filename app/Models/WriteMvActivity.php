<?php
namespace App\Models;

use App\Scopes\TeamScope;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class WriteMvActivity extends Activity
{
    protected $table = 'activity_log';

    public function activity_causer(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'causer_type', 'causer_id')->withoutGlobalScope(TeamScope::class);
    }
}