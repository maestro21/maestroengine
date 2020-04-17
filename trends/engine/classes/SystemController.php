<?php

class SystemController extends Singleton {


    public function updateDbAction() {

        $tables = getTables();
        $models = models();

        /** @var Model $model */
        foreach($models as $model) {
            $model = model($model);
            $table = $model->getTable();
            if($model->notInDb()) continue;

            if(!in_array($table,$tables)) {
                db_create_table($model);
            } else {
                db_update_table($model);
            }
        }
    }

    public function p1Action() {
        DBquery("UPDATe trends SET traffic = traffic * 1000;");
        echo "Patch 1: Update traffic implemented";
    }


    public function unp1Action() {
        DBquery("UPDATe trends SET traffic = traffic / 1000;");
        echo "REVERT Patch 1: Update traffic implemented";
    }
}