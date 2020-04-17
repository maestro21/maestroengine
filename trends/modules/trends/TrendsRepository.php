<?php


class TrendsRepository extends Repository
{


    /**
     * TrendsRepository constructor.
     */
    public function __construct()
    {
        parent::__construct('trends');
    }


    public function findExisting(string $name, string $time, string $country) {
        $model = $this
                ->clear()
                ->select()
                ->from($this->table)
                ->where(qEq('country', $country))
                ->where(qEq('name',$name))
                ->where(qEq('time', oTime($time)->getSqlFormat()))
            ->run(DBROW);

        if($model) $model = createModelFromDBData('TrendsModel', $model);

        return $model;
    }

    public function markAsRead() {
        $this->update($this->table)->set('new',false)->run();
    }

    public function list($country = 0) {
        return $this->getModels($this
            ->qlist('*')
                ->where(qEq('country', $country))
                ->order('new DESC')
                ->order('time DESC')
            ->run());
    }
}