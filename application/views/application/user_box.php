<?php trace(__FILE__,'begin'); ?>
<div id="userbox">
  <ul id="account_more_menu">

    <?php if(isset($_userbox_projects) && is_array($_userbox_projects) && count($_userbox_projects)) { ?>
    <li><a href="<?php echo get_url('dashboard', 'my_projects') ?>"><?php echo lang('my projects') ?></a>
      <ul>
<?php if (Project::canAdd(logged_user())) { ?>
        <li><a href="<?php echo get_url('project', 'add') ?>"><?php echo lang('add project') ?></a></li>
        <li><a href="<?php echo get_url('project', 'copy') ?>"><?php echo lang('copy project') ?></a></li>
<?php } // if ?>
        <li><span><?php echo lang('projects') ?>:</span></li>
        <?php foreach($_userbox_projects as $_userbox_project) { ?>
        <li><a href="<?php echo $_userbox_project->getOverviewUrl() ?>"><?php echo clean($_userbox_project->getName()) ?></a></li>
        <?php } // if ?>
<?php
  // PLUGIN HOOK
  plugin_manager()->do_action('my_projects_dropdown');
  // PLUGIN HOOK
?>
      </ul>
    </li>
    <?php } // if ?>

<?php if((!is_null(active_project())) && isset($_userbox_projects) && is_array($_userbox_projects) && count($_userbox_projects)) { ?>
    <li><a href="<?php echo get_url('dashboard', 'my_tasks') ?>"><?php echo active_project()->getName() ?> Project</a>
      <ul>
        <li><a href="<?php echo get_url('project', 'overview') ?>"><?php echo lang('overview') ?></a></li>
        <li class="header"><a href="<?php echo get_url('message', 'index') ?>"><?php echo lang('messages') ?></a></li>
<?php if (ProjectMessage::canAdd(logged_user(), active_project())) { ?>
        <li><a href="<?php echo get_url('message', 'add') ?>"><?php echo lang('add message') ?></a></li>
<?php } // if ?>
        <li class="header"><a href="<?php echo get_url('task', 'index') ?>"><?php echo lang('tasks') ?></a></li>
<?php if (ProjectTaskList::canAdd(logged_user(), active_project())) { ?>
        <li><a href="<?php echo get_url('task', 'add_list') ?>"><?php echo lang('add task list') ?></a></li>
<?php } // if ?>
        <li class="header"><a href="<?php echo get_url('milestone', 'index') ?>"><?php echo lang('milestones') ?></a></li>
        <li><a href="<?php echo get_url('milestone', 'calendar') ?>"><?php echo lang('view calendar') ?></a></li>
<?php if (ProjectMilestone::canAdd(logged_user(), active_project())) { ?>
        <li><a href="<?php echo get_url('milestone', 'add') ?>"><?php echo lang('add milestone') ?></a></li>
<?php } // if ?>
<?php
  // PLUGIN HOOK
  plugin_manager()->do_action('my_tasks_dropdown');
  // PLUGIN HOOK
?>
      </ul>
    </li>
<?php } // if ?>

    <?php if(logged_user()->isAdministrator()) { ?>
    <li><a href="<?php echo get_url('administration') ?>"><?php echo lang('administration') ?></a> 
      <ul>
        <li class="header"><a href="<?php echo get_url('administration', 'company') ?>"><?php echo lang('company') ?></a></li>
        <li><a href="<?php echo get_url('company', 'edit') ?>"><?php echo lang('edit company') ?></a></li>
        <li><a href="<?php echo owner_company()->getAddUserUrl() ?>"><?php echo lang('add user') ?></a></li>
        <li class="header"><a href="<?php echo get_url('administration', 'clients') ?>"><?php echo lang('clients') ?></a></li>
        <li><a href="<?php echo get_url('company', 'add_client') ?>"><?php echo lang('add client') ?></a></li>
        <li class="header"><a href="<?php echo get_url('administration', 'projects') ?>"><?php echo lang('projects') ?></a></li>
        <li class="header"><a href="<?php echo get_url('administration', 'configuration') ?>"><?php echo lang('configuration') ?></a></li>
        <li class="header"><a href="<?php echo get_url('administration', 'plugins') ?>"><?php echo lang('plugins') ?></a></li>
        <li class="header"><a href="<?php echo get_url('administration', 'tools') ?>"><?php echo lang('administration tools') ?></a></li>
        <li><a href="<?php echo get_url('administration', 'tool_mass_mailer') ?>"><?php echo lang('administration tool name mass_mailer' ) ?></a></li>
        <li class="header"><a href="<?php echo get_url('administration', 'upgrade') ?>"><?php echo lang('upgrade') ?></a></li>
<?php
 // PLUGIN HOOK
  plugin_manager()->do_action('administration_dropdown');
  // PLUGIN HOOK
?>
      </ul>
    </li>
    <?php } // if ?>

    <li class="user"><a href="<?php echo logged_user()->getAccountUrl() ?>"><?php echo clean($_userbox_user->getDisplayName()) ?></a>
      <ul>
        <li><span><?php echo lang('account') ?>:</span></li>
<?php  if (logged_user()->canUpdateProfile(logged_user())) { ?>
        <li><a href="<?php echo logged_user()->getEditProfileUrl() ?>"><?php echo lang('update profile') ?></a></li>
        <li><a href="<?php echo logged_user()->getEditPasswordUrl() ?>"><?php echo lang('change password') ?></a></li>
        <li><a href="<?php echo logged_user()->getUpdateAvatarUrl() ?>"><?php echo lang('update avatar') ?></a></li>
<?php  } // if ?>
<?php  if (logged_user()->canUpdatePermissions(logged_user())) { ?>
        <li><a href="<?php echo logged_user()->getUpdatePermissionsUrl() ?>"><?php echo lang('update permissions') ?></a></li>
<?php  } // if ?>
        <li><span><?php echo lang('more') ?>:</span></li>
        <li><a href="<?php echo get_url('dashboard', 'my_projects') ?>"><?php echo lang('my projects') ?></a></li>
        <li><a href="<?php echo get_url('dashboard', 'my_tasks') ?>"><?php echo lang('my tasks') ?></a></li>
        <li><a id="logout" class="js-confirm" href="<?php echo get_url('access', 'logout') ?>" title="<?php echo lang('confirm logout') ?>"><?php echo lang('logout') ?></a></li>
<?php
  // PLUGIN HOOK
  plugin_manager()->do_action('my_account_dropdown');
  // PLUGIN HOOK
?>
      </ul>
    </li>

  </ul>
</div>
<?php trace(__FILE__,'end'); ?>
