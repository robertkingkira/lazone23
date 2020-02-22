(function() {
    const search = instantsearch ({
        appId: 'MY0JMPNXFM',
        apiKey: '9006ef73c02035428c14d5a65d452b04',
        indexName: 'products',
        urlSync: true
    });

    search.addWidget(
        instantsearch.widgets.hits({
           container: '#hits',
           templates: {
               empty: 'No results',
               item: function(item) {
                    return `
                    <a class="result-link" href="${window.location.origin}/shop/${item.slug}">
                        <div class="instantsearch-result">
                            <div>
                                <img src="${window.location.origin}/storage/${item.image}" alt="img" class="algolia-thumb-result">
                            </div>

                            <div>
                                <div class="result-title">
                                    ${item._highlightResult.name.value}
                                </div>
                                <div class="result-details">
                                    ${item._highlightResult.details.value}
                                </div>
                                <div class="result-price">
                                    $${(item.price / 100).toFixed(2)}
                                </div>
                            </div>
                        </div>
                    </a>    
                    <hr class="algolia-line-break">
                    `;
               } 

            //'<em>Hit {{objectID}}</em>: {{{_highlightResult.name.value}}}'
           }
        })  
    );

    //initialize SearchBox
    search.addWidget(
        instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: 'Search for products'
        })
    );

    //initialize pagination
    search.addWidget(
        instantsearch.widgets.pagination({
            container: '#pagination',
            maxPages: 20,
            //default is to scroll to 'body', here we disable this behavior
            scrollTo: false
        })
    );

    search.addWidget(
        instantsearch.widgets.stats({
            container: '#stats-container'
        })
    );

    // initialize RefinementList
    search.addWidget(
        instantsearch.widgets.refinementList({
            container: '#refinement-list',
            attributeName: 'categories',
            sortBy: ['name:asc']
        })
    );

    search.start();
})();