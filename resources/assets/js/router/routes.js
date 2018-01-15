import Route from './Route'
import Hello from '@/components/Hello'

export default [

  /*
  |
  | All application routes are defined here.
  |
  */

  Route.set('/', Hello).name('hello').get()
  // Route.set('/', Hello).name('hello').middleware(Middleware).get()

]
