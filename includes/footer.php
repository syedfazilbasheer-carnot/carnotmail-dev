<hr>

	      <footer>
	      	<!-- Check if sub user -->
			<?php if(!get_app_info('is_sub_user')):?>
	        <p>
	        	&copy; <?php echo date("Y",time())?> <a href="http://nullrefer.com/?https://sendy.co" title="" target="_blank">Sendy</a> | <a href="http://nullrefer.com/?https://sendy.co/troubleshooting" target="_blank">Troubleshooting</a> | <a href="http://nullrefer.com/?https://sendy.co/forum/" target="_blank">Support forum</a> | Version <?php echo get_app_info('version');?> | Cracked By Chaks | For feature additions come with a Pizza to my desk or you wont be acknowledged.
	        </p>
	        <?php else:?>
	        <p>&copy; <?php echo date("Y",time())?> <?php echo get_app_info('company');?></p>
	        <?php endif;?>
	      </footer>
	    </div>
	</body>
</html>
