<?php $user =  checkLogged();
    if($user) { ?>
    <div class="dropdownmenu right">
        <ul class="topmenu">
            <li><?php echo userInfo($user['id']);?>
            <ul>
                <li><a href="<?php echo BASE_URL;?>users/editprofile"><i class="far fa-edit"></i><?php echo T('Edit profile');?></a></li>
                <li><a href="#" onclick="logout()"><i class="fas fa-sign-out-alt"></i><?php echo T('Logout');?></a></li>
            </ul>
            </li>
        </ul>
    </div>
<script>
function logout() {
    call('<?php echo BASE_URL . 'system/logout';?>');
}
</script>

<?php return; } ?>


<?php echo btn([
    'icon' => "fas fa-sign-in-alt", 
    'class'=> 'loginbtn', 
    'text' => T('login'),
    'onclick' => "eModal('.loginform')"
    ]); ?>
<div class="hidden loginform">
    <h2><?php echo T('sign in');?></h2>
    <form method="POST" id="loginform" action="<?php echo BASE_URL;?>users/login">
    <input type="hidden" name="mode" id="mode" value="<?php echo $id;?>">
    <table cellpadding=0 cellspacing=0>
    <?php
        echo drawForm([
            'user' => ['string', WIDGET_TEXT, 'required' => true],
            'password' => ['string', WIDGET_PASS, 'required' => true]
        ]);
    ?>
        <tr>
            <td colspan=2>
                <a href="javascript:void(0)" onclick="eModal('.recoverform')"><?php echo T('recover password');?>
            
                <?php echo btn([
                    'icon' => "fas fa-sign-in-alt", 
                    'onclick' => 'login()', 
                    'class'=> 'right submit ok', 
                    'text' => T('sign in')
                    ]); ?>
            </td>
        </tr>
        </table>
    </form>
    <?php echo T('not registered?');?> <a href="javascript:void(0)" onclick="eModal('.regform')"><?php echo T('register');?></a>
</div>    

<div class="hidden regform">
    <h2><?php echo T('register');?></h2>
    <form method="POST" id="regform" action="<?php echo BASE_URL;?>users/register">
    <input type="hidden" name="mode" id="mode" value="<?php echo $id;?>">
    <table cellpadding=0 cellspacing=0>
        <?php
            echo drawForm([
                'username' => ['string', WIDGET_TEXT, 'required' => true],
                'email' => ['string', WIDGET_EMAIL, 'required' => true],
                'pass' => ['string', WIDGET_PASS, 'required' => true],
                'pass2' => ['string', WIDGET_PASS, 'required' => true],
            ]);
        ?>
        <tr>
            <td colspan="2" align="center">
            <?php echo btn([
                'icon' => "fas fa-registered", 
                'class'=> 'submit ok', 
                'onclick' => 'register()',
                'text' => T('register')
                ]); ?>
            </td>
        </tr>
    </table>
    </form>
    <?php echo T('already registered?');?> <a href="javascript:void(0)" onclick="eModal('.loginform')"><?php echo T('login');?></a>
</div>

<div class="hidden recoverform">
    <h2><?php echo T('recover');?></h2>
    <form method="POST" id="recoverform" action="<?php echo BASE_URL;?>users/recover">
    <input type="hidden" name="mode" id="mode" value="<?php echo $id;?>">
    <table cellpadding=0 cellspacing=0>
        <?php
            echo drawForm([
                'email' => ['string', WIDGET_TEXT],
            ]);
        ?>
        <tr>
            <td colspan="2" align="center">
            <?php echo btn([
                'icon' => "fas fa-envelope", 
                'class'=> 'submit info', 
                'text' => T('recover'),
                'onclick' => "recover()"
                ]); ?>
            </td>
        </tr>
    </table>
    </form>
</div>


<script>

   
    function login() { 
        sendForm($('.loginform form'));
    }

    function register() {
        sendForm($('#regform'));
    }


    function recover() {
        sendForm($('.recoverform form'));
    }


</script>
