import docsearch from '@docsearch/js';

import '@docsearch/css';

docsearch({
    container: '#search',
    appId: import.meta.env.VITE_ALGOLIA_APP_ID,
    indexName: 'dasun',
    apiKey: import.meta.env.VITE_ALGOLIA_SECRET,
    placeholder: 'Search'
});
