<?php
declare(strict_types=1);

namespace TestApp\Policy;

use Authorization\IdentityInterface;
use Cake\Datasource\QueryInterface;

class ArticlesTablePolicy
{
    public function canIndex(IdentityInterface $identity)
    {
        return $identity['can_index'];
    }

    public function canEdit(IdentityInterface $identity)
    {
        return $identity['can_edit'];
    }

    public function canModify(IdentityInterface $identity)
    {
        return $identity['can_edit'];
    }

    public function scopeEdit(?IdentityInterface $user, QueryInterface $query)
    {
        if ($user === null) {
            return $query->where([
                'visibility' => 'public',
            ]);
        }

        return $query->where([
            'user_id' => $user['id'],
        ]);
    }

    public function scopeModify(IdentityInterface $user, QueryInterface $query)
    {
        return $query->where([
            'identity_id' => $user['id'],
        ]);
    }

    public function scopeAdditionalArguments(IdentityInterface $user, QueryInterface $query, $firstArg, $secondArg)
    {
        return $query->where([
            'identity_id' => $user['id'],
            'firstArg' => $firstArg,
            'secondArg' => $secondArg,
        ]);
    }
}
