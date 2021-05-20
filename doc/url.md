# De quoi est composé une url ?

```
https://google.fr/search/celebrity?page=2&lang=fr#coucou
  |           |          |                |         |
  |           |          |                |         |
protocole     |          |                |         |
(https://)    |          |                |       Anchor
              |          |                |      (#coucou)
        Nom de domaine   |                |
           (google.fr)   |                |
                         |                |
                        Path              |
                        URI               |
                       Resource           |
                  (/search/celebrity)     |
                                          |
                                     Query String
                                        Filters
                                        Queries
                                   (?page=2&lang=fr)
```