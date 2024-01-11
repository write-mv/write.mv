<?php

namespace App\Models;

use App\Scopes\TeamScope;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Activitylog\Models\Activity;

class WriteMvActivity extends Activity
{
    protected $table = 'activity_log';

    public function activity_causer(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'causer_type', 'causer_id')->withoutGlobalScope(TeamScope::class);
    }
}
