project( Impl3 )
cmake_minimum_required( VERSION 2.8 )

include_directories( include )

set(SRCS
src/math.cpp
src/Regresion.cpp
)

add_library(base SHARED
${SRCS}
)
add_executable( impl3 src/main.cpp)

target_link_libraries( impl3 base )
