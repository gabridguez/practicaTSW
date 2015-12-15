<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'QuestionWorld');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
  echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
  echo $this->Html->css('bootstrap');
  echo $this->Html->css('qworld.css');
  echo $this->Html->css('fileinput.min.css');
  echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js');
  echo $this->Html->script('bootstrap.min.js');
  echo $this->Html->script('fileinput.min.js');
  echo $this->fetch('meta');
  echo $this->fetch('css');
  echo $this->fetch('script');
  ?>
</head>
<body class="font-helvetic-bold">
	<div id="container">
		
   <div class="container tamanhoTextoNavbar" >
    <div class="row-fluid" id="principal" style="">
      <nav class="navbar navbar-default navbar-qworld">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
              <span class="glyphicon glyphicon-console" aria-hidden="true"></span>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li class=""><?php echo $this->Html->link(
                __('Recent Questions'),
                array('controller' => 'preguntas', 'action' => 'index'),
                array("class"=>"navbar-option")
                ); ?></li>

                <li class="">
                <?php //"controller"=>"preguntas",
                echo $this->Form->create('Pregunta',array("type"=>"get",  "action"=>"buscar","class"=>"navbar-form navbar-left navbar-search-form"));
                echo $this->Form->input("searchtext",array('label' => false,"div"=> false,"class"=>"form-control navbar-search-box", "placeholder"=>__("Search question"),"escape"=>false));
             
echo $this->Form->button('<span class=" glyphicon glyphicon-search"></span>', array(

 'type' => 'submit',
 'class' => 'btn btn-default ',
 'escape' => false
 ));
echo $this->Form->end();
               
?></li>
</ul>



                
                <ul class="nav navbar-nav navbar-right">
                	<li><?php echo $this->Html->link(
                    __('Add Pregunta'),
                    array('controller' => 'preguntas', 'action' => 'add'),
                array("class"=>"navbar-option")
                    ); ?></li>
                  <li><?php echo $this->Html->link(
                    __('My Questions'),
                    array('controller' => 'preguntas', 'action' => 'mine'),
                array("class"=>"navbar-option")
                    ); ?></li>
                  <li class="visible-xs"><?php echo $this->Html->link(
                   __('AccountSettings'),
                   '/users/view/'.$currentLogin['id']
                   ); ?></li>
                  <li class="visible-xs"><?php echo $this->Html->link(
                   __('Logout'),
                   '/users/logout'
                   ); ?></li>
                   <li class="dropdown visible-lg visible-md visible-sm visible-xs ">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-flag " aria-hidden="true"></span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                     <li><?php echo $this->Html->link(
                      __('English'),
                      '/users/language/'."eng"
                      ); ?></li>
                      <li role="separator" class="divider"></li>
                      <li><?php echo $this->Html->link(
                        __('Spanish'),
                        '/users/language/'."esp"
                        ); ?></li>
                        
                        
                        </ul>

                        <li class="dropdown visible-lg visible-md visible-sm">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span><span class="caret"></span></a>
                          <ul class="dropdown-menu">
                           <li><?php echo $this->Html->link(
                             __('AccountSettings'),
                             '/users/view/'.$currentLogin['id']
                             ); ?></li>
                             <li role="separator" class="divider"></li>
                             <li><?php echo $this->Html->link(
                               __('Logout'),
                               '/users/logout'
                               ); ?></li>

                             </ul>
                           </li>
                         </ul>
                       </div>
                     </div>
                   </nav>
                 </div>
               </div>


               <div id="content">

                 <?php echo $this->Flash->render(); ?>

                 <?php echo $this->fetch('content'); ?>
               </div>
               <div class="container ">
                <footer id="footer" class="footerStyle">
                  <ul class="list-inline footerContent" align="center">
                    <li>MG</li>
                    <li>·</li>
                    <li><a href=""><?=__('Contact')?></a></li>
                    <li>·</li>
                    <li><a href=""><?=__('About')?></a></li>
                    <li>·</li>
                    <li><a href=""><?=__('Problem here')?></a></li>


                  </footer>
                  <div><a class="goUp" href="#"><?php echo $this->Html->image('goUp.png', array('alt' => 'UP', 'class' => "goUpImage"));?></a></div>
                </div>
              </div>
              
            </body>
            </html>
<!--echo $this->element('sql_dump');--> 