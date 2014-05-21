<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<rss version="2.0">
	<channel>
		<title>International Referral | News feed</title>
		<link>{{ URL::to('/') }}</link>
		<description>News feed</description>
		@foreach ($news as $newspost)
			@foreach($newspost['content'] as $row)
<item>
			<title>{{ htmlspecialchars($row['heading']) }}</title>
			<link>{{ URL::to('/article/' . $newspost['id']) }}</link>
			<author>{{ htmlspecialchars($newspost['member']['first_name']) . ' ' . htmlspecialchars($newspost['member']['last_name']) }}</author>
			<?php
			foreach($members as $member)
			{
				if($member['id'] == $newspost['member']['id'])
				{
					echo '<body>';
					$pa_index = 0;

					if(count($member['practice_areas']) > 0):
						foreach($member['practice_areas'] as $pa):
							if ($pa_index > 0):
								echo ", ";
							endif;
							echo $pa['name'];
							$pa_index++;
						endforeach;
						 
						echo ' in '; 
						$r_index = 0;
						
					endif;
						foreach($member['regions'] as $region):
							if ($r_index > 0):
							echo ", ";
							endif;
							echo $region['country_name'];
							$r_index++;
						endforeach;
					echo '</body>'; 
				
					// Exit when we find the correct member
					break;
				}
			}
			?>	
		</item>
			@endforeach
		@endforeach
	</channel>
</rss>