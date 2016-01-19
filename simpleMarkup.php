<?php
	class markup
	{
		public $version = 0.1;
		public function hyperlinks( $text = null )
		{
			if($text == null)
			{
				return false;
			}
			$text = html_entities($text);
			return preg_replace('/(ftp:\/\/|irc:\/\/|ircs:\/\/|http:\/\/|https:\/\/)([a-zA-Z0-9\/\.\-_:\?,\=]+)/i', '<a href="$1$2">$2</a>', $text);
		}
		public function postMarkup( $text = null )
		{
			if( $text == null )
			{
				return false;
			}
			$text = html_entities($text);
			$text = preg_replace('/\[([a-zA-Z0-9\/\.\-_:\?,\=\s]+)\]\((ftp:\/\/|irc:\/\/|ircs:\/\/|http:\/\/|https:\/\/)([a-zA-Z0-9\/\.\-_:\?,\=]+)\)/i', '<a href="$2$3" target=_new>$1</a>', $text);
			$text = preg_replace('/\*\*([a-zA-Z0-9\/\.\-_:\?,\=\s\)\(\*\&\^\!\@\#\$\%\^\+\=\`\~\{\}\[\]]+)\*\*/i', '<strong>$1</strong>', $text);
			$text = preg_replace('/\-\-([a-zA-Z0-9\/\.\-_:\?,\=\s\)\(\*\&\^\!\@\#\$\%\^\+\=\`\~\{\}\[\]]+)\-\-/i', '<del>$1</del>', $text);
			$text = preg_replace('/\`([a-zA-Z0-9\/\.\-_:\?,\=\s\)\(\*\&\^\!\@\#\$\%\^\+\=\`\~\{\}\[\]]+)\`/i', '<code>$1</code>', $text);
			$text = preg_replace('/\~\~([a-zA-Z0-9\/\.\-_:\?,\=\s\)\(\*\&\^\!\@\#\$\%\^\+\=\`\~\{\}\[\]]+)\~\~/i', '<em>$1<\em>', $text);
			$text = preg_replace('/\_\_([a-zA-Z0-9\/\.\-_:\?,\=\s\)\(\*\&\^\!\@\#\$\%\^\+\=\`\~\{\}\[\]]+)\_\_/i', '<u>$1</u>', $text);
			return $text;
		}
	}
	$markup = new markup();
	echo $markup->postMarkup(file_get_contents("markup.txt"));
?>