<?php

namespace Boost {

    interface ContainerInterface {

        public function clear();
        public function destroy($name);
        public function get($name);
        public function has($name);
        public function set($name, $value);

    }

}