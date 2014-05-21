<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<rss version="2.0">
	<channel>
		<title>International Referral | News feed</title>
		<link>{{ URL::to('/') }}</link>
		<description>Adviser feed</description>
		@foreach ($members as $member)
<item>
			<title>{{ htmlspecialchars($member['first_name']) . ' ' . htmlspecialchars($member['last_name']) }}</title>
			<link>{{ URL::to('/advisor/' . $member['id']) }}</link>
			<author>{{ htmlspecialchars($member['firm']['name']) }}</author>
			<?php
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
			?>
			
			<image><enclosure type="image/*" URL="{{ URL::to('/attachments/members/' . $member['id'] . '.' . $member['image_extention']) }}" /></image>
		</item>
		@endforeach
	</channel>
</rss>