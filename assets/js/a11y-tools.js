document.addEventListener('DOMContentLoaded', () => {
  const status = document.getElementById('a11y-status');

  // TEXT SIZE
  const MIN = 0.9, MAX = 1.4, STEP = 0.1;
  const KEY = 'a11yFontScale';

  function getScale() {
    const cssVal = getComputedStyle(document.documentElement)
      .getPropertyValue('--a11y-font-scale')
      .trim();
    const n = parseFloat(cssVal);
    return Number.isFinite(n) ? n : 1;
  }

  function setScale(val) {
    const v = Math.min(MAX, Math.max(MIN, val));
    document.documentElement.style.setProperty('--a11y-font-scale', v);
    localStorage.setItem(KEY, String(v));
    if (status) status.textContent = `Text size set to ${Math.round(v * 100)} percent.`;
  }

  const saved = parseFloat(localStorage.getItem(KEY));
  if (!Number.isNaN(saved)) setScale(saved);

  document.getElementById('a11y-text-inc')?.addEventListener('click', () => setScale(getScale() + STEP));
  document.getElementById('a11y-text-dec')?.addEventListener('click', () => setScale(getScale() - STEP));

  // READ ALOUD (Text-to-Speech)
  const btnRead = document.getElementById('a11y-read');
  let isReading = false;

  function getReadableText() {
    const main = document.querySelector('#main-content') || document.querySelector('main') || document.body;
    return (main.textContent || '').replace(/\s+/g, ' ').trim();
  }

  function stopReading() {
    window.speechSynthesis.cancel();
    isReading = false;
    btnRead?.setAttribute('aria-pressed', 'false');
    if (status) status.textContent = 'Read aloud stopped.';
  }

  function startReading() {
    if (!('speechSynthesis' in window)) {
      if (status) status.textContent = 'Read aloud is not supported in this browser.';
      return;
    }

    const text = getReadableText();
    if (!text) {
      if (status) status.textContent = 'Nothing to read on this page.';
      return;
    }

    window.speechSynthesis.cancel();
    const utter = new SpeechSynthesisUtterance(text);

    utter.onend = () => {
      isReading = false;
      btnRead?.setAttribute('aria-pressed', 'false');
      if (status) status.textContent = 'Read aloud finished.';
    };

    window.speechSynthesis.speak(utter);
    isReading = true;
    btnRead?.setAttribute('aria-pressed', 'true');
    if (status) status.textContent = 'Read aloud started.';
  }

  btnRead?.addEventListener('click', () => {
    if (isReading) stopReading();
    else startReading();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && isReading) stopReading();
  });
});