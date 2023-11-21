  import route from 'ziggy'
  import { Ziggy } from '@/ziggy'

  export default function(name, params, absolute) {
      return route(name, params, absolute, Ziggy)
  }