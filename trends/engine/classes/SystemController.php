<?php

class SystemController extends Singleton {


    public function updateDbAction() {

        $tables = getTables();
        $models = models();

        /** @var Model $model */
        foreach($models as $model) {
            $model = model($model);
            $table = $model->getTable();

            if(!in_array($table,$tables)) {
                db_create_table($model);
            } else {
                db_update_table($model);
            }
        }
    }

}