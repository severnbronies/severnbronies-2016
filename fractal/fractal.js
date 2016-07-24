'use strict';

const fractal = module.exports = require('@frctl/fractal').create();
fractal.set('project.title', 'Severn Bronies Pattern Library');
fractal.components.set('path',  __dirname + '/components');
fractal.docs.set('path', __dirname + '/docs');
fractal.components.set('default.preview', '@preview');
fractal.web.set('static.path',  './dst');
fractal.web.set('builder.dest', './pattern-library');