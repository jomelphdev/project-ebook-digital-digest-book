<?php
/**
*  Unyson - 1 Click Demo "Array and string offset access syntax with curly braces" Fix
*/


add_action(
	'fw_ext_backups_task_types_register',
	'_action_odrin_unyson_backup_curly_braces_fix',
    9
);

if( !function_exists('_action_odrin_unyson_backup_curly_braces_fix') ) {
    
	function _action_odrin_unyson_backup_curly_braces_fix(_FW_Ext_Backups_Task_Type_Register $task_types) {

        remove_action(
            'fw_ext_backups_task_types_register',
            '_action_fw_ext_backups_register_built_in_task_types'
        );

        // all the files loaded from $dir are the fixed versions that come bundled in the theme
	
        $dir = get_theme_file_path('/inc/includes/unyson-classes');

        $unyson_dir = WP_PLUGIN_DIR . '/unyson-subsolar/framework/extensions/backups/includes/module/tasks/type';

        require_once $dir .'/class-fw-ext-backups-task-type-db-export.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_DB_Export());

        require_once $dir .'/class-fw-ext-backups-task-type-db-restore.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_DB_Restore());

        require_once $unyson_dir .'/class-fw-ext-backups-task-type-dir-clean.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Dir_Clean());

        require_once $unyson_dir .'/class-fw-ext-backups-task-type-zip.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Zip());

        require_once $unyson_dir .'/class-fw-ext-backups-task-type-unzip.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Unzip());

        require_once $dir .'/class-fw-ext-backups-task-type-files-export.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Files_Export());

        require_once $dir .'/class-fw-ext-backups-task-type-files-restore.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Files_Restore());

        require_once $unyson_dir .'/class-fw-ext-backups-task-type-image-sizes-remove.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Image_Sizes_Remove());

        require_once $unyson_dir .'/class-fw-ext-backups-task-type-image-sizes-restore.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Image_Sizes_Restore());

        require_once $unyson_dir .'/download/class-fw-ext-backups-task-type-download.php';
        $task_types->register(new FW_Ext_Backups_Task_Type_Download());

	}

}
