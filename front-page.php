<?php
/*
	Template Name: Home
*/
get_header();

// wp_enqueue_style('frontpage-css');
$css_path = get_template_directory() . '/assets/css/pages/frontpage.css';

	if (file_exists($css_path)) {
		echo '<style>';
		readfile($css_path);
		echo '</style>';
	}
?>

<main id="main-content" class="site-main" role="main">
  <div class="container">
    <h1>Welcome to our accessible site</h1>

    <p>
      Use the A− / A+ buttons to change text size. Use “Read aloud” to listen to the page content.
      This does not turn VoiceOver on/off; it uses browser text-to-speech.
    </p>

    <section aria-labelledby="sec-1">
      <h2 id="sec-1">Services</h2>
      <p>We build accessible WordPress websites with proper headings, landmarks, and keyboard support.</p>
      <a class="button" href="#">Learn more</a>
    </section>

    <section aria-labelledby="sec-2">
      <h2 id="sec-2">Contact</h2>
      <form>
        <label for="email">Email</label>
        <input id="email" type="email" autocomplete="email">
        <button type="submit">Send</button>
      </form>
    </section>
  </div>
</main>

<?php
	get_footer();
?>