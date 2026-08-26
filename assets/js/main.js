(function () {
	var header = document.querySelector('[data-header]');
	var copyButton = document.querySelector('[data-copy-email]');
	var matrixRain = document.querySelector('[data-matrix-rain]');
	var matrixChars = '01{}[]<>/AGENT_LLM_CONTEXT_TOOL_GUARDRAIL_API_DATA';

	function updateHeader() {
		if (!header) {
			return;
		}

		header.classList.toggle('is-scrolled', window.scrollY > 20);
	}

	updateHeader();
	window.addEventListener('scroll', updateHeader, { passive: true });

	function createMatrixRain() {
		if (!matrixRain || window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
			return;
		}

		var width = window.innerWidth || document.documentElement.clientWidth;
		var columns = Math.min(28, Math.max(12, Math.floor(width / 58)));
		var fragment = document.createDocumentFragment();

		matrixRain.textContent = '';

		for (var index = 0; index < columns; index += 1) {
			var column = document.createElement('span');
			var length = 18 + (index % 9);
			var stream = '';

			for (var charIndex = 0; charIndex < length; charIndex += 1) {
				stream += matrixChars[(index * 7 + charIndex * 5) % matrixChars.length];
			}

			column.textContent = stream;
			column.style.setProperty('--matrix-left', ((index + 0.5) / columns * 100) + '%');
			column.style.setProperty('--matrix-speed', (12 + (index % 8) * 1.2) + 's');
			column.style.setProperty('--matrix-delay', (-1 * (index % 10) * 1.35) + 's');
			column.style.setProperty('--matrix-opacity', (0.16 + (index % 5) * 0.055).toFixed(2));

			fragment.appendChild(column);
		}

		matrixRain.appendChild(fragment);
	}

	createMatrixRain();

	if (copyButton && navigator.clipboard) {
		copyButton.addEventListener('click', function () {
			var email = copyButton.getAttribute('data-copy-email');

			navigator.clipboard.writeText(email).then(function () {
				var originalText = copyButton.textContent;
				copyButton.textContent = 'Email copiado';
				copyButton.setAttribute('aria-live', 'polite');

				window.setTimeout(function () {
					copyButton.textContent = originalText;
				}, 1800);
			});
		});
	}
}());
