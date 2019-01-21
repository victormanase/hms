<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        
        
        $modules=array('overview','departments','designations','salaryscales','banks','nationalities','leavetypes','qualifications','workstations','employees','leaves','vacancies','applications','fieldstudents','internships','volunteers','scholarships','roles','users');
        $actions=array('create','read','update','delete');
        foreach ($modules as $module) {
            foreach ($actions as $action ) {
                $permission=new Permission();
                $permission->display_name=$module;
                $permission->name=$action.'-'.$module;
                $permission->description='Can '.$action.' '.$module;
                $permission->save();
            }
           
        }

        $basic_permissions=array('view-personal-dashboard','view-personal-profile','request-leave');

        foreach ($basic_permissions as $permissions) {

            $permission=new Permission();

            $permission->display_name='basic_permission';
                $permission->name=$permissions;
                $permission->description='Can '.$permissions;
                $permission->save();
          
        }
       

    }
}
